const ul = document.querySelector(".parent_div_input_check");
input = document.querySelector(".input_check_to");
// tagNumb = document.querySelector(".details span");

let maxTags = 10,
tags = [];

// countTags();
createTag();

// function countTags(){
//     input.focus();
//     tagNumb.innerText = maxTags - tags.length;
// }

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li class="to_email_txt_tags_arr noselect_txt">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

function addTag(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags.includes(tag)){
            if(tags.length < 10){
                tag.split(',').forEach(tag => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

input.addEventListener("keyup", addTag);

// const removeBtn = document.querySelector(".details button");
// removeBtn.addEventListener("click", () =>{
//     tags.length = 0;
//     ul.querySelectorAll("li").forEach(li => li.remove());
//     // countTags();
// });



// css input
const ul_cc = document.querySelector(".parent_div_input_check_cc");
const input_cc = document.querySelector(".input_check_cc");
// tagNumb = document.querySelector(".details span");

let maxTags_cc = 10,
tags_cc = [];

// countTags();
createTag_cc();

// function countTags(){
//     input.focus();
//     tagNumb.innerText = maxTags - tags.length;
// }

function createTag_cc(){
    ul_cc.querySelectorAll("li").forEach(li => li.remove());
    tags_cc.slice().reverse().forEach(tag =>{
        let liTag = `<li class="cc_email_txt_arr noselect_txt">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_cc(this, '${tag}')"></i></li>`;
        ul_cc.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}

function remove_cc(element, tag){
    let index  = tags_cc.indexOf(tag);
    tags_cc = [...tags_cc.slice(0, index), ...tags_cc.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

function addTag_cc(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags_cc.includes(tag)){
            if(tags_cc.length < 10){
                tag.split(',').forEach(tag => {
                    tags_cc.push(tag);
                    createTag_cc();
                });
            }
        }
        e.target.value = "";
    }
}

input_cc.addEventListener("keyup", addTag_cc);


// label js input box tags

const ul_label = document.querySelector(".parent_div_input_check_label");
const input_label = document.querySelector(".input_check_label");
// tagNumb = document.querySelector(".details span");

let maxTags_label = 10,
tags_label = [];

// countTags();
createTag_label();

// function countTags(){
//     input.focus();
//     tagNumb.innerText = maxTags - tags.length;
// }

function createTag_label(){
    ul_label.querySelectorAll("li").forEach(li => li.remove());
    tags_label.slice().reverse().forEach(tag =>{
        let liTag = `<li class="label_input_tags_txt noselect_txt">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_label(this, '${tag}')"></i></li>`;
        ul_label.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}

function remove_label(element, tag){
    let index  = tags_label.indexOf(tag);
    tags_label = [...tags_label.slice(0, index), ...tags_label.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

function addTag_label(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags_label.includes(tag)){
            if(tags_label.length < 10){
                tag.split(',').forEach(tag => {
                    tags_label.push(tag);
                    createTag_label();
                });
            }
        }
        e.target.value = "";
    }
}

input_label.addEventListener("keyup", addTag_label);


// edit input label
  
const ul_edit_label = document.querySelector(".edit_parent_div_input_check_label");
const input_edit_label = document.querySelector(".edit_input_check_label");
// tagNumb = document.querySelector(".details span");

let maxTags_label_edit = 10,
tags_label_edit = [];
// existing array handle this function
function label_get_arr(tags_label_edit1){
    
    tags_label_edit = tags_label_edit1;

    // countTags();
    createTag_label_edit();

}

// this function insert the records in list order this order view the input tags
function createTag_label_edit(){
    ul_edit_label.querySelectorAll("li").forEach(li => li.remove());
    tags_label_edit.slice().reverse().forEach(tag =>{
        let liTag = `<li class="label_input_tags_txt_edit">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_label_edit(this, '${tag}')"></i></li>`;
        ul_edit_label.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}

// this function each time to enter the key so trigger the top function for adding elements
function addTag_label_edit(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags_label_edit.includes(tag)){
            if(tags_label_edit.length < 10){
                tag.split(',').forEach(tag => {
                    tags_label_edit.push(tag);
                    createTag_label_edit();
                });
            }
        }
        e.target.value = "";
    }
}

// this function is key up function for label adding
input_edit_label.addEventListener("keyup", addTag_label_edit);

// this function is remove onclick function for that particular array
function remove_label_edit(element, tag){
    let index  = tags_label_edit.indexOf(tag);
    tags_label_edit = [...tags_label_edit.slice(0, index), ...tags_label_edit.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}


// edit to email arr js function

const ul_edit_to = document.querySelector(".edit_parent_div_input_check");
const input_edit_to = document.querySelector(".input_check_to_edit");
// tagNumb = document.querySelector(".details span");

let maxTags_to_edit = 10,
tags_to_edit = [];
// this function get the exisiting array elements function
function to_email_get_arr(tags_to_edit1){
        
    tags_to_edit = tags_to_edit1;
    // countTags();
    createTag_to_edit();
    // function countTags(){
    //     input.focus();
    //     tagNumb.innerText = maxTags - tags.length;
    // }
}

// this function gets the array to insert the div element array to visibility
function createTag_to_edit(){
    ul_edit_to.querySelectorAll("li").forEach(li => li.remove());
    tags_to_edit.slice().reverse().forEach(tag =>{
        let liTag = `<li class="to_email_input_tags_txt_edit">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_to_edit(this, '${tag}')"></i></li>`;
        ul_edit_to.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}


// this function each time the enter and , its specified to split and insert array
function addTag_to_edit(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags_to_edit.includes(tag)){
            if(tags_to_edit.length < 10){
                tag.split(',').forEach(tag => {
                    tags_to_edit.push(tag);
                    createTag_to_edit();
                });
            }
        }
        e.target.value = "";
    }
}

// this function every time array keyup this function trigger
input_edit_to.addEventListener("keyup", addTag_to_edit);



// this function remove the particular element in the array 
function remove_to_edit(element, tag){
    let index  = tags_to_edit.indexOf(tag);
    tags_to_edit = [...tags_to_edit.slice(0, index), ...tags_to_edit.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

// cc email arr funtion edit modal

const ul_edit_cc= document.querySelector(".edit_parent_div_input_check_cc");
const input_edit_cc = document.querySelector(".input_check_cc_edit");
// tagNumb = document.querySelector(".details span");

let maxTags_cc_edit = 10,
tags_cc_edit = [];
// this function get the exsiting records for the div records
function cc_email_get_arr(mydata){
    tags_cc_edit = mydata;

    // countTags();
    createTag_cc_edit();

    // function countTags(){
    //     input.focus();
    //     tagNumb.innerText = maxTags - tags.length;
    // }

}

// this function insert the array in the particular div for the visibility of the ui
function createTag_cc_edit(){
    ul_edit_cc.querySelectorAll("li").forEach(li => li.remove());
    tags_cc_edit.slice().reverse().forEach(tag =>{
        let liTag = `<li class="cc_email_input_tags_txt_edit noselect_txt">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_cc_edit(this, '${tag}')"></i></li>`;
        ul_edit_cc.insertAdjacentHTML("afterbegin", liTag);
    });
    // countTags();
}

// this function each time type the input its just pslit and insert the div 
function addTag_cc_edit(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags_cc_edit.includes(tag)){
            if(tags_cc_edit.length < 10){
                tag.split(',').forEach(tag => {
                    tags_cc_edit.push(tag);
                    createTag_cc_edit();
                });
            }
        }
        e.target.value = "";
    }
}

// this function is keyup function trigger the split function
input_edit_cc.addEventListener("keyup", addTag_cc_edit);


// this function remove the particular element in the array
function remove_cc_edit(element, tag){
    let index  = tags_cc_edit.indexOf(tag);
    tags_cc_edit = [...tags_cc_edit.slice(0, index), ...tags_cc_edit.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}


// onchange function 

// add modal reset array

// reset array for the add alert modal
$('#work_check_toggle').on('change',function(){
    tags_label = [];

});

// reset array for the add alert modal

$('#email_check_toggle').on('change',function(){
    tags = [];
    tags_cc = [];

});

// edit modal reset array
// work edit toggle button
$('#work_edit_check_toggle').on('change',function(){
    tags_label_edit = [];
});

// email edit toggle button
$('#edit_email_check_toggle').on('change',function(){
    tags_cc_edit = [];
    tags_to_edit = [];
});





