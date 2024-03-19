const baseUrl = "https://dummyjson.com";
const fn = {
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
};

export default fn;