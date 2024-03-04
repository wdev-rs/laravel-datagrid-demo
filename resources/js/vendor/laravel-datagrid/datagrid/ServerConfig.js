import {url_append} from "../laravel-datagrid";

export class ServerConfig {

    constructor() {
    }

    search(keyword) {
        const urlSearchParams = new URLSearchParams(window.location.search),
            baseUrl = (window.location.origin + window.location.pathname).replace(/\/$/, "");

        urlSearchParams.set('search', keyword)

        const url = baseUrl + '?' + urlSearchParams.toString();
        return this.get(url);
    }

    pagination(page, limit) {
    }

    sort(order, dir) {
        const urlSearchParams = new URLSearchParams(window.location.search),
            baseUrl = (window.location.origin + window.location.pathname).replace(/\/$/, "");

        urlSearchParams.delete('order[]');
        urlSearchParams.delete('dir[]');

        if (order.length) {
            order.forEach(function (ord, index) {
                urlSearchParams.append('order[]', ord)
                urlSearchParams.append('dir[]', dir[index] || 'asc')
            });
        }

        const url = baseUrl + '?' + urlSearchParams.toString();

        return this.get(url);
    }

    get(url) {
        console.log(url);
        return new Promise((resolve, reject) => {
            axios.get(url).then(result => {
                history.pushState({}, '', url);
                resolve(result.data);
            });
        });
    }
}
