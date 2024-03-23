const baseUrl = "http://localhost:8000";
const fn = {
    async fetchAuthApi(endPoint = "", params = "", requestType = "GET") {
        const authData = this.getAuthStorage();
        if (authData != undefined && authData != null && authData != "") {
            let request = {
                method: requestType.toUpperCase(),
                headers: {
                    "Access-Control-Allow-Origin": "*",
                    "Authorization": "Bearer " + authData.accessToken,
                    Accept: "application/vnd.api+json",
                    "Content-Type": "application/vnd.api+json",
                },
            }

            if (requestType.toUpperCase() == "POST" || "PUT" == requestType.toUpperCase()) {
                request.body = JSON.stringify(params);
            }

            const res = await fetch(baseUrl + endPoint, request);

            const response = await res.json();
            return response;
        }
    },
    async fetchPublicApi(endPoint = "", params = "", requestType = "GET") {
        let request = {
            method: requestType.toUpperCase(),
            headers: {
                "Access-Control-Allow-Origin": "*",
                Accept: "application/vnd.api+json",
                "Content-Type": "application/vnd.api+json",
            },
        }

        if (requestType.toUpperCase() == "POST" || "PUT" == requestType.toUpperCase()) {
            request.body = JSON.stringify(params);
        }

        const res = await fetch(baseUrl + endPoint, request);

        const response = await res.json();
        return response;
    },
    setStorage(key, value) {
        localStorage.setItem(key, value);
    },
    getStorage(key) {
        return localStorage.getItem(key);
    },
    removeStorage(key) {
        return localStorage.removeItem(key);
    },
    setAuthStorage(value) {
        this.setStorage("auth", JSON.stringify(value));
    },
    getAuthStorage() {
        return JSON.parse(this.getStorage("auth"));
    },
};

export default fn;