$( document ).ready(function() {
    resizeAdminHeaderMenu();
    resizeAdminHeaderMenu2();
});

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
            ], 300, 1,
            ()=>{
                menu.style.display = "none";
            },280);
        }else{
            //menu.style.display = "block";
            animate(()=>{
                menu.style.display = "block";
            },
            menu,
            [
                { transform: 'translateX(-200px)' },
                { transform: 'translateX(0)' }
            ], 300, 1);
        }
    }
}


//admin 
//index.html.twig
/*
$("#admin-index").on("click","button#add-category",()=>{
    $("#ModalLabel").text("Ajouter une category");
    $("#btn-modal").click();
});*/
$("#admin-index button#add-category").click(()=>{
    $("#ModalLabel").text("Ajouter une category");
    $("#category_id").val("");;
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
    let id = $(this).attr("data-id");
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
});


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