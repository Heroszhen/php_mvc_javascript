function animate(func1 = null,elm,tab,duration1,iterations,func2=null,duration2=null){
    if(func1 != null)func1();
    elm.animate(tab, {
        duration: duration1,
        iterations: iterations
    });
    if(func2 != null)setTimeout(func2, duration2);
}



function getXhr(type,url){
    let xhr = new XMLHttpRequest();

    if(type == "get"){
        xhr.open('GET', url);
        xhr.send();
    }
    
    if(type == "post"){
        
    }
    return xhr;
}

async function myFetch(method, url, jsonString="", responseType="json"){
    let response;
    if(method == "get" || method == "delete"){
        response = await fetch(url,{method:method});
    }
    if(method == "post" || method == "put"){
        response = await fetch("/admin/modifycategory/" + id,{
            method:method,
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: jsonString
        });
    }

    if(responseType == "json")response = await response.json();
    else response = await response.text();

    return response;
}
