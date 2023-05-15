let defaultPosts = 2;
let loadPosts = 2;
let filters = {};

function sendAjaxRequest() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                displayFilteredResults(response);
            } else {
                console.error('Помилка ' + xhr.status + ': ' + xhr.statusText);
            }
        }
    };

    var url = filter_object.ajaxurl + '?action=filter_casino' + '&posts=' + loadPosts;

    Object.keys(filters).forEach(function(filter) {
        if (filters[filter]) {
            url += '&' + filter + '=' + encodeURIComponent(filters[filter]);
        }
    });

    xhr.open('GET', url, true);
    xhr.send();
}

function displayFilteredResults(response) {
    let resultsContainer = document.getElementById('filtered-results');
    let loadMoreButton = document.querySelector('.casino-load');
    let allPosts = document.querySelector('.filter-number');

    resultsContainer.innerHTML = '';

    var results = response.results;
    if (results.length > 0) {
        for (var i = 0; i < results.length; i++) {
            var casino = results[i];
            var listItem = document.createElement('li');
            listItem.classList.add('casino-list_point');
            listItem.innerHTML = `<div class="casino-list_info">
                        <div class="casino-list_img">
                            <img src="${casino.image}" alt="img">
                        </div>
                        <div class="casino-list_rating">
                            <span class="casino-list_number">${casino.rating}</span>
                            <span class="casino-list_stars" data-stars="${casino.rating}"></span>
                        </div>
                    </div>
                    <div class="casino-list_text">
                        <a href="${casino.permalink}" class="casino-list_title title-m">${casino.title}</a>
                        <span class="casino-list_descr text-lg">${casino.sub_title}</span>
                    </div>
                    <ul class="casino-list_check">
                        ${casino.casino_check}
                    </ul>
                    <ul class="casino-list_logo">
                        ${casino.payments}
                    </ul>
                    <div class="casino-list_buttons">
                        <a href="${casino.get_bonus}" class="casino-list_bonus btn-four">
                            Get bonus
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3.97217H16.8159C17.0135 3.44164 17.0531 2.86526 16.9299 2.31279C16.8067 1.76014 16.5258 1.25524 16.1215 0.858987C15.5537 0.309044 14.7944 0.00132964 14.0039 0.000343926C13.2136 -0.00082796 12.4535 0.3052 11.8844 0.853458L9.99997 2.73249L8.12163 0.858987C7.55343 0.308701 6.79357 0.000686808 6.00255 1.09368e-06C5.21154 -0.000668549 4.45134 0.306194 3.88228 0.855644C3.47648 1.25174 3.19455 1.75714 3.07065 2.31026C2.94677 2.86354 2.98611 3.44096 3.18416 3.9723H0.999943C0.734764 3.9723 0.4803 4.0776 0.2928 4.2651C0.1053 4.45277 0 4.70704 0 4.97224V8.97236C0 9.23754 0.1053 9.49183 0.2928 9.67933C0.4803 9.867 0.734743 9.9723 0.999943 9.9723V18.9697C0.999943 19.2349 1.10524 19.4894 1.29291 19.6769C1.48041 19.8644 1.73472 19.9697 1.99988 19.9697H18.0002C18.2653 19.9697 18.5196 19.8644 18.7071 19.6769C18.8948 19.4894 19.0001 19.2349 19.0001 18.9697V9.97187C19.2653 9.97187 19.5198 9.86657 19.7073 9.67907C19.8948 9.49157 20 9.23712 20 8.97192V4.97198C20 4.70664 19.8948 4.45234 19.7073 4.26484C19.5198 4.07734 19.2653 3.97187 19.0001 3.97187L19 3.97217ZM13.3012 2.26526C13.4881 2.08111 13.7402 1.97815 14.0025 1.97865C14.265 1.97932 14.5166 2.08362 14.7026 2.26861C14.8926 2.45326 15 2.70691 15 2.97172C15 3.23673 14.8926 3.49038 14.7026 3.67483L14.405 3.97216L11.589 3.97232L13.3012 2.26526ZM5.29725 3.67586C5.10623 3.4907 4.99875 3.23589 4.99959 2.9697C5.00026 2.70369 5.10908 2.44954 5.3011 2.26522C5.48826 2.08056 5.7409 1.97727 6.00387 1.97827C6.26687 1.97945 6.51867 2.08441 6.70433 2.27074L8.41073 3.97247H5.59403L5.29725 3.67586ZM1.99977 5.97223H18.0001V7.97229H1.99977V5.97223ZM2.99972 9.97217H8.99972L8.99989 17.9697H2.99988L2.99972 9.97217ZM16.9999 17.9697H10.9999V9.97217H16.9999V17.9697Z" />
                            </svg>
                        </a>
                        <a href="${casino.play_demo}" class="casino-list_play btn-one">
                            Play demo
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white" />
                            </svg>
                        </a>
                        <a href="${casino.permalink}" class="casino-list_read btn-five">Read Review</a>
                    </div>`;
            resultsContainer.appendChild(listItem);
        }
    } else {
        resultsContainer.innerHTML = '<p>No results found.</p>';
    }

    loadMoreButton.dataset.count = response.posts;
    allPosts.innerHTML = response.all_posts + ' casino';

    if (response.posts >= response.all_posts) {
        loadMoreButton.style.display = 'none';
    } else {
        loadMoreButton.style.display = 'block';
    }

}

function handleFilterSubmit(event) {
    event.preventDefault();

    let providers = document.querySelector('.filter_providers').value;
    let languages = document.querySelector('.filter_languages').value;
    let pokies = document.querySelector('.filter_free-pokies').value;
    let payment = document.querySelector('.filter_payment-methods').value;
    var sort = document.querySelector('select[name="sort"]').value;

    filters = {
        providers: providers,
        languages: languages,
        pokies: pokies,
        payment: payment,
        sort: sort
    };

    sendAjaxRequest();
}

function handleResetFilters(event) {
    event.preventDefault();

    document.querySelector('.filter_providers').selectedIndex = 0;
    document.querySelector('.filter_languages').selectedIndex = 0;
    document.querySelector('.filter_free-pokies').selectedIndex = 0;
    document.querySelector('.filter_payment-methods').selectedIndex = 0;
    document.querySelector('select[name="sort"]').selectedIndex = 0;

    filters = {};
    sendAjaxRequest();
}

function handleLoadMore(event) {
    event.preventDefault();
    let loadMoreButton = document.querySelector('.casino-load');

    loadPosts = Number(loadMoreButton.dataset.count) + defaultPosts;
    sendAjaxRequest();
}

sendAjaxRequest();

event_filters = document.querySelectorAll('.form-select_point');
event_filters.forEach((filter) => {
    filter.addEventListener('change', handleFilterSubmit)
})

document.querySelector('.filter-reset').addEventListener('click', handleResetFilters);

document.querySelector('.casino-load').addEventListener('click', handleLoadMore);

