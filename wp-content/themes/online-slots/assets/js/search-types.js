function sendSearchRequest(searchQuery, types) {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                displaySearchResults(response);
            } else {
                console.error('Помилка ' + xhr.status + ': ' + xhr.statusText);
            }
        }
    };

    let url = ajax_object.ajaxurl + '?action=search_posts';

    url += '&type=' + encodeURIComponent(types);

    url += '&query=' + encodeURIComponent(searchQuery);

    xhr.open('GET', url, true);
    xhr.send();
}

function displaySearchResults(results) {
    let resultsContainer = document.getElementById('search-results');
    resultsContainer.innerHTML = '';

    if (results.length > 0) {
        let dropdownList = document.createElement('ul');
        dropdownList.classList.add('form-search_list');
        for (let i = 0; i < results.length; i++) {
            let post = results[i];
            let listItem = document.createElement('li');
            listItem.innerHTML = '<a href="' + post.permalink + '"><div class="form-search_img"><img src="' + post.image + '" alt="img"></div><span class="form-search_title">' + post.title + '</span></a>';
            dropdownList.appendChild(listItem);
        }
        resultsContainer.appendChild(dropdownList);
    } else {
        resultsContainer.innerHTML = '<p>No results found.</p>';
    }
}

function handleSearchInput(event) {
    let searchQuery = event.target.value;
    let types = event.target.dataset.type;

    if (searchQuery.length > 0) {
        sendSearchRequest(searchQuery, types);
    } else {
        let resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = '';
    }
}

let searchInput = document.getElementById('search-input');
searchInput.addEventListener('input', handleSearchInput);
