const dropdown = document.getElementById('dropdown');
const searchInput = document.getElementById('search-input');

function filterResults() {
    const query = searchInput.value.toLowerCase();
    dropdown.innerHTML = '';

    if (query) {
        const results = [
            { text: query, label: 'in Experiences', url: `https://www.roblox.com/discover/?Keyword=${query}`, class: 'experience-item' },
            { text: query, label: 'in People', url: `https://www.roblox.com/search/users?keyword=${query}`, class: 'people-item' },
            { text: query, label: 'in Groups', url: `https://www.roblox.com/search/groups?keyword=${query}`, class: 'groups-item' },
            { text: query, label: 'in Marketplace', url: `https://www.roblox.com/catalog?CatalogContext=1&Keyword=${query}`, class: 'marketplace-item' }
        ];

        results.forEach(result => {
            const div = document.createElement('div');
            div.className = `dropdown-item ${result.class}`;

            div.innerHTML = `<span class="search-text">${result.text}</span> <span>${result.label}</span>`;
            
            div.onclick = () => {
                window.location.href = result.url;
            };
            dropdown.appendChild(div);
        });

        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
}

window.onclick = function(event) {
    if (!event.target.matches('#search-input') && !event.target.closest('.search-container')) {
        dropdown.style.display = 'none';
    }
};