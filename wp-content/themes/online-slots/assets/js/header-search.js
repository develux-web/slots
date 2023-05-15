function sendHeaderSearchRequest(searchQuery, types) {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                displayHeaderSearchResults(response);
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

function displayHeaderSearchResults(results) {
    let resultsContainer = document.getElementById('header-search-results');
    resultsContainer.innerHTML = '';

    if (results.length > 0) {
        let dropdownList = document.createElement('ul');
        dropdownList.classList.add('header-search_list');
        for (let i = 0; i < results.length; i++) {
            let post = results[i];
            let listItem = document.createElement('li');
            listItem.classList.add('header-search_point');
            listItem.innerHTML = '<a href="' + post.permalink + '" class="header-search_link"><div class="header-search_img"><img src="' + post.image + '" alt="img"></div><span class="header-search_title">' + post.title + '</span></a>';
            dropdownList.appendChild(listItem);
        }
        resultsContainer.appendChild(dropdownList);
    } else {
        resultsContainer.innerHTML = '<p>No results found.</p>';
    }
}

function handleHeaderSearchInput(event) {
    let searchQuery = event.target.value;
    let types = event.target.dataset.type;

    if (searchQuery.length > 0) {
        sendHeaderSearchRequest(searchQuery, types);
    } else {
        let resultsContainer = document.getElementById('header-search-results');
        resultsContainer.innerHTML = '';
    }
}

let headerSearchInput = document.getElementById('header-search-input');
headerSearchInput.addEventListener('input', handleHeaderSearchInput);
