document.addEventListener('DOMContentLoaded', function() {
    loadProviders();
});

let filters = {};
function loadProviders() {
    var xhr = new XMLHttpRequest();
    let url = ajax_object.ajaxurl + '?action=load_providers';

    Object.keys(filters).forEach(function(filter) {
        if (filters[filter]) {
            url += '&' + filter + '=' + encodeURIComponent(filters[filter]);
        }
    });

    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var providers = JSON.parse(xhr.responseText);
            displayProviders(providers);
        }
    };
    xhr.send();
}

function displayProviders(response) {
    var providersContainer = document.querySelector('.providers-list');
    let allPosts = document.querySelector('.filter-number');
    providersContainer.innerHTML = '';

    var providers = response.providers;
    providers.forEach(function(provider) {
        let providerElement = document.createElement('li');
        let template = `<a href="/casino/?providers=${provider.slug}" class="providers-list_link">
                            <div class="providers-list_wrap">
                                <img class="providers-list_img" src="${provider.image}" alt="img">
                                <span class="providers-list_label">${provider.count} Games</span>
                            </div>
                            <span class="providers-list_title">${provider.name}</span>
                        </a>`;
        providerElement.innerHTML = template;
        providersContainer.appendChild(providerElement);
    });

    allPosts.innerHTML = response.all_terms + ' Makers';
}


function handleFilterSubmit(event) {
    event.preventDefault();
    var sort = document.querySelector('select[name="sort"]').value;

    filters = {
        sort: sort
    };
    loadProviders();
}

function handleResetFilters(event) {
    event.preventDefault();

    document.querySelector('select[name="sort"]').selectedIndex = 0;

    filters = {};
    loadProviders();
}


event_filters = document.querySelectorAll('.form-select_point');
event_filters.forEach((item) => {
    item.addEventListener('change', handleFilterSubmit)
})

document.querySelector('.filter-reset').addEventListener('click', handleResetFilters);
