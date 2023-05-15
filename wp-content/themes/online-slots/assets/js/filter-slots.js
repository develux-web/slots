let defaultPosts = 20;
let loadPosts = 20;
let filters = {};

function sendAjaxRequest() {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                displayFilteredResults(response);
            } else {
                console.error('Помилка ' + xhr.status + ': ' + xhr.statusText);
            }
        }
    };

    let url = filter_object.ajaxurl + '?action=filter_slots' + '&posts=' + loadPosts;

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
    let loadMoreButton = document.querySelector('.slots-load');
    let allPosts = document.querySelector('.filter-number');

    resultsContainer.innerHTML = '';

    let results = response.results;
    if (results.length > 0) {
        for (let i = 0; i < results.length; i++) {
            let slot = results[i];
            let listItem = document.createElement('li');
            listItem.classList.add('slots-list_point');
            listItem.innerHTML = '<a data-rating="' + slot.rating + '" href="' + slot.permalink + '" class="slots-item"><div class="slots-item_img"><img src="' + slot.image + '" alt="img"> </div><span class="slots-item_name">' + slot.title + '</span></a>';
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

    let features = document.querySelector('.filter_features').value;
    let themes = document.querySelector('.filter_themes').value;
    let sort = document.querySelector('select[name="sort"]').value;

    filters = {
        features: features,
        themes: themes,
        sort: sort
    };

    sendAjaxRequest();
}

function handleResetFilters(event) {
    event.preventDefault();

    document.querySelector('.filter_features').selectedIndex = 0;
    document.querySelector('.filter_themes').selectedIndex = 0;
    document.querySelector('select[name="sort"]').selectedIndex = 0;

    filters = {};

    sendAjaxRequest();
}

function handleLoadMore(event) {
    event.preventDefault();
    let loadMoreButton = document.querySelector('.slots-load');

    loadPosts = Number(loadMoreButton.dataset.count) + defaultPosts;
    sendAjaxRequest();
}

sendAjaxRequest();

event_filters = document.querySelectorAll('.form-select_point');
event_filters.forEach((filter) => {
    filter.addEventListener('change', handleFilterSubmit)
})

document.querySelector('.filter-reset').addEventListener('click', handleResetFilters);

document.querySelector('.slots-load').addEventListener('click', handleLoadMore);

