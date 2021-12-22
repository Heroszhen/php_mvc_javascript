$( document ).ready(function() {
    resizeAdminHeaderMenu();
    resizeAdminHeaderMenu2();
});

const host_name = "http://localhost:8000/";

function resizeAdminHeaderMenu(){
    let width = window.innerWidth;
    let header = document.getElementById("admin-header");
    let menu = document.getElementById("admin-menu");
    let admin = document.getElementsByClassName("admin")[0];
    if(header != null && header != undefined && menu != null && menu != undefined){
        if(width > 767){
            header.style.paddingLeft = "200px";
            menu.style.top = "0";
            menu.style.height = "100vh";
            menu.style.display = "block";
            admin.style.paddingLeft = "200px";
        }else{
            header.style.paddingLeft = "0";
            menu.style.top = "70px";
            menu.style.height = "calc(100vh - 70px)";
            admin.style.paddingLeft = "0";
        }
    }
}

function resizeAdminHeaderMenu2(){
    window.addEventListener('resize', (event)=>{
        resizeAdminHeaderMenu();
    });
}

function switchAdminMenu(){
    let width = window.innerWidth;
    let menu = document.getElementById("admin-menu");
    if(width <= 767){
        if(menu.style.display == "" || menu.style.display == "block"){
            //menu.style.display = "none";
            animate(null,menu,
            [
                { transform: 'translateX(-200px)' }
            ], 200, 1,
            ()=>{
                menu.style.display = "none";
            },180);
        }else{
            //menu.style.display = "block";
            animate(()=>{
                menu.style.display = "block";
            },
            menu,
            [
                { transform: 'translateX(-200px)' },
                { transform: 'translateX(0)' }
            ], 200, 1);
        }
    }
}


//admin 
//index.php
/*
$("#admin-index").on("click","button#add-category",()=>{
    $("#ModalLabel").text("Ajouter une category");
    $("#btn-modal").click();
});*/
$("#admin-index button#add-category").click(()=>{
    $("#ModalLabel").text("Ajouter une category");
    $("#category_id").val("");
    $("#category_name").val("");
    $("#btn-modal").click();
});

$("#admin-index").on("submit","form#form-add-category",function(e){
    e.preventDefault();
    let sform = $(this).serialize();
    let id = $("input#category_id").val();
    if(id == ""){
        $.post(
            "/admin/addcategory",
            sform,
            function (response) {
                if(response["status"] == undefined)$("#admin-index tbody").prepend(response);
                $("#close-modal").click();
            }
        );
    }else{
        let form = e.currentTarget;//get all doms from the dom
        let formData = new FormData(form);//Si un élément HTML form est fourni, il capture automatiquement ses champs.
        /**
         * formData.entries() : iterator of formData
         * Object.fromEntries : transforms a list of key-value pairs into an object
         */
        let plainFormData = Object.fromEntries(formData.entries());
	    let formDataJsonString = JSON.stringify(plainFormData);
        fetch("/admin/modifycategory/" + id,{
            method:'PUT',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: formDataJsonString
        })
        .then(response => response.text())
        .then(json=>{
            let btn = document.querySelector("button.modifycategory[data-id='"+id+"']");
            let tr = btn.parentNode.parentNode;
            let td = tr.childNodes[3];
            td.innerHTML = formData.get("category_name");
            alert("Enregistrée");
        });
    }
    
});

$("#admin-index").on("click","button.modifycategory",function(){
    let type = 2;
    let id = $(this).attr("data-id");
    if(type == 1){
        $.get(
            "/admin/getcategory/" + id,
            function (response) {
                response = JSON.parse(response);
                if(response["status"] == 1){
                    let category = response["message"];
                    $("input#category_id").val(category["id"]);
                    $("input#category_name").val(category["name"]);
                    $("#ModalLabel").text("Modifier une category");
                    $("#btn-modal").click();
                }
            }
        );
    }else{
        getCategory_xhr(id);
    }
    
});

function getCategory_xhr(id){
    let xhr = getXhr("get","/admin/getcategory/" + id);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           let category = JSON.parse(xhr.responseText)["message"];
           document.querySelector("input#category_id").value = category["id"];
           document.querySelector("input#category_name").value = category["name"];
           document.querySelector("#ModalLabel").innerHTML = "Modifier une category";
           document.querySelector("#btn-modal").click();
        }
    };
}


function deleteCategory(e,id){
    let tr = e.target.parentNode.parentNode;
    fetch("/admin/deletecategory/" + id,{method:'DELETE'})
    .then(response => response.text())
    .then(json=>{
        tr.remove();
    });
}

function findCategory(keywords){
    let trs = document.querySelectorAll("tr");
    trs.forEach((tr)=>{
        let td_name = tr.childNodes[3];
        tr.classList.add("d-none");
        if(td_name.innerHTML.toLowerCase().includes(keywords.toLowerCase()))tr.classList.remove("d-none");
    });
}

//photos.php
let files = [];
function openModal_adminphotos(){
    files = [];
    cleanChosenPhotos();
    document.getElementById('btn-modal-adminphotos').click()
}

function choosePhotos(fileslist){
    displayFiles(fileslist);
}
function dragenter(e){
    return false;
}
function dragleave(e){
    return false;
}
function dragover(e){
    e.preventDefault()
    e.stopPropagation()
    return false;
}
function drop(e){
    e.preventDefault()
    e.stopPropagation()
    let dt = e.dataTransfer
    displayFiles(dt.files);
    return false;
}

function displayFiles(fileslist){
    let list = document.getElementById("chosen-photos");
    for (let i = 0; i < fileslist.length; i++) {
        files.push(fileslist.item(i));
        let reader = new FileReader();
        reader.onload = function (e) {
            let div = document.createElement("div");
            div.classList.add("photo_wrap");
            let div2 = document.createElement("div");
            div2.classList.add("deletephoto");
            div2.setAttribute("data-key",i);
            div2.innerHTML = "X";
            div2.setAttribute('onclick',"removeFile("+i+")");
            div.appendChild(div2);
            let img = document.createElement("img");
            img.setAttribute("src",e.target.result);
            img.setAttribute("alt","");
            //img.onclick = removeFile(i);
            div.appendChild(img);
            list.appendChild(div)
        }
        reader.readAsDataURL(fileslist.item(i));
        
    }
}
function removeFile(key){
    files.splice(key,1);
    let div = document.querySelector("div[data-key='"+key+"']");
    div.parentNode.remove();
    
}

function uploadPhotos(){
    let type = 2;
    if(files.length != 0){
        if(type == 1)uploadPhotos_fetch();
        if(type == 2)uploadPhotos_jquery();
    }
}

function uploadPhotos_fetch(){
    files.forEach(file=>{
        let form_data = new FormData();
        form_data.append('photo', file);
        fetch("/admin/fetchuploadphoto", {
            method:"POST",
            body : form_data
        }).then(function(response){
            return response.text();
        }).then(function(text){
            //let response_dom = new DOMParser().parseFromString(text, "text/xml");
            document.getElementById("allphoto").insertAdjacentHTML( 'afterbegin',text );
        });
    });
    cleanChosenPhotos();
}

function uploadPhotos_jquery(){
    files.forEach(file=>{
        let form_data = new FormData();
        form_data.append('photo', file);
        $.ajax({
            url: '/admin/jqueryuploadphoto',
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){
                document.getElementById("allphoto").insertAdjacentHTML( 'afterbegin',data );
            }
        });
    });
    cleanChosenPhotos();
}

function insertPhotos(fileslist){
    let form_allphoto = document.getElementById("form-allphoto");
    for(i = 0;i < fileslist.length;i++){
        let reader = new FileReader();
        reader.onload = function (e) {
            let div = document.createElement("div");
            div.classList.add("col-6");
            div.classList.add("col-md-4");
            div.classList.add("col-lg-2");
            div.classList.add("mb-2");
            div.classList.add("pointer");
            let img = document.createElement("img");
            img.setAttribute("src",e.target.result);
            div.appendChild(img);
            form_allphoto.appendChild(div);
        }
        reader.readAsDataURL(fileslist.item(i));
    }
}


function cleanChosenPhotos(){
    document.getElementById("chosen-photos").innerHTML = "";
}


function deletePhoto($id,e){
    fetch("/admin/deletephoto/" + $id,{method:'DELETE'})
    .then(function(response){
        return response.json();
    }).then(function(json){
        let col = e.target.parentNode.parentNode.parentNode.parentNode;
        col.remove();
    }); 
}

function sortPhotos(keywords){
    let images = document.querySelectorAll(".photo_wrap img");
    images.forEach((img)=>{
        let col = img.parentNode.parentNode.parentNode;
        col.classList.add("d-none")
        let alt = img.getAttribute("alt");
        if(alt.toLowerCase().includes(keywords.toLowerCase()))col.classList.remove("d-none");
    });
}

/**
 * 
 * @param {string} url 
 * @param {int} type 1:localhost, 2 hostname(constant),3 other
 */
function showPhoto(url,type){
    if(type == 1)document.querySelector("#bigimg img").setAttribute("src",url);
    document.getElementById("bigimg").style.display = "flex";
}

function closeBigimg(){
    document.getElementById("bigimg").style.display = "none";
    document.querySelector("#bigimg img").removeAttribute("src");
}


//onearticle.php
async function copyPhotoUrl(name){
    let input = document.createElement("input");
    input.classList.add("d-none");
    input.setAttribute("value", host_name + "public/photos/" + name);
    document.body.appendChild(input);
    await navigator.clipboard.writeText(input.value);
    document.body.removeChild(input);
    alert("Copié");
}