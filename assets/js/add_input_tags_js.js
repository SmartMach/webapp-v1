// ADD ALERT to email input initialize variable
var to_email_add = document.querySelector('.parent_div_input_check');
var input_to_email_add = document.querySelector(".input_check_to");

var add_to_email_arr = new Array();

// ADD ALERT CC EMAIL INPUT INITIALIZATION 
var cc_email_add = document.querySelector('.parent_div_input_check_cc');
var input_cc_email_add = document.querySelector('.input_check_cc');

var add_cc_email_arr = new Array();


// edit alert to email input initialization variable
var to_email_edit = document.querySelector('.edit_parent_div_input_check');
var input_to_email_edit = document.querySelector('.input_check_to_edit');
var edit_to_email_arr = new Array();

// edit alert cc email input initialization variable
var cc_email_edit = document.querySelector('.edit_parent_div_input_check_cc');
var input_cc_email_edit = document.querySelector('.input_check_cc_edit');
var edit_cc_email_arr = new Array();
var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



to_email_createTag();

// add elements in to email function
function to_email_createTag(){
    to_email_add.querySelectorAll('li').forEach(li => li.remove());
    add_to_email_arr.slice().reverse().forEach(res =>{
        let list_tiem = `<li class="to_email_txt_tags_arr noselect_txt default_font_size">${res} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove(this, '${res}')"></i></li>`;
        to_email_add.insertAdjacentHTML("afterbegin", list_tiem);
    });
}

// add alert element to email
function remove(element, tag){
    let index  = add_to_email_arr.indexOf(tag);
    add_to_email_arr = [...add_to_email_arr.slice(0, index), ...add_to_email_arr.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

// add alert after key enter function to email
function addTag_to_email(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !add_to_email_arr.includes(tag)){
            if(add_to_email_arr.length < 10){
                tag.split(',').forEach(tag => {
                    if (email_pattern.test(tag)) {
                        add_to_email_arr.push(tag);
                        to_email_createTag();
                    }else{
                        $('#input_check_to_Err').text('Valid Email**');
                    }
                   
                });
            }
        }
        e.target.value = "";
    }
}

input_to_email_add.addEventListener("keyup", addTag_to_email);


// add alert cc email 
cc_email_createTag();


// add elements in cc email function
function cc_email_createTag(){
    cc_email_add.querySelectorAll("li").forEach(li => li.remove());
    add_cc_email_arr.slice().reverse().forEach(res =>{
        let list_item_cc = `<li class="cc_email_txt_arr noselect_txt default_font_size">${res} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="cc_email_remove(this, '${res}');"></i></li>`;
        cc_email_add.insertAdjacentHTML("afterbegin", list_item_cc);
    });
}

// add elements in cc email remove tags function
function cc_email_remove(element,item){
    let index  = add_cc_email_arr.indexOf(item);
    add_cc_email_arr = [...add_cc_email_arr.slice(0, index), ...add_cc_email_arr.slice(index + 1)];
    element.parentElement.remove();
}


// add tag function list out the values in cc email
function addTag_cc_email(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !add_cc_email_arr.includes(tag)){
            if(add_cc_email_arr.length < 10){
                tag.split(',').forEach(tag => {
                    if (email_pattern.test(tag)) {
                        add_cc_email_arr.push(tag);
                        cc_email_createTag();
                    }else{
                        $('#input_check_cc_Err').text('Valid Email**');
                    }
                   
                });
            }
        }
        e.target.value = "";
    }
}

input_cc_email_add.addEventListener("keyup", addTag_cc_email);


// edit alert to email function
function to_email_get_arr(to_email_demo_arr){
    edit_to_email_arr = to_email_demo_arr;
    createTag_to_email_edit();
}

// this function for edit alert create list element
function createTag_to_email_edit(){
    to_email_edit.querySelectorAll("li").forEach(li => li.remove());
    edit_to_email_arr.slice().reverse().forEach(tag =>{
        let liTag = `<li class="to_email_input_tags_txt_edit default_font_size">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_to_email_edit(this, '${tag}')"></i></li>`;
        to_email_edit.insertAdjacentHTML("afterbegin", liTag);
    });
}

// this function to email input after enter is add the element
function addTag_to_email_edit(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !edit_to_email_arr.includes(tag)){
            if(edit_to_email_arr.length < 10){
                tag.split(',').forEach(tag => {
                    if (email_pattern.test(tag)) {
                        edit_to_email_arr.push(tag);
                        createTag_to_email_edit();
                    }else{
                        $('#input_check_to_edit_Err').text('valid Email**');
                    }
                   
                });
            }
        }
        e.target.value = "";
    }
}

input_to_email_edit.addEventListener("keyup", addTag_to_email_edit);

// this function remove the element in to email 
function remove_to_email_edit(element, tag){
    let index  = edit_to_email_arr.indexOf(tag);
    edit_to_email_arr = [...edit_to_email_arr.slice(0, index), ...edit_to_email_arr.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}

// EDIT ALERT CC EMAIL FUNCTION
function cc_email_get_arr(mydata){
    edit_cc_email_arr = mydata;
    createTag_cc_email_edit();
}

// this function goes to cc email input add list element design
function createTag_cc_email_edit(){
    cc_email_edit.querySelectorAll("li").forEach(li => li.remove());
    edit_cc_email_arr.slice().reverse().forEach(tag =>{
        let list_item = `<li class="cc_email_input_tags_txt_edit noselect_txt default_font_size">${tag} <i class="fa fa-close" style="margin-left:0.4rem;" onclick="remove_cc_email_edit(this, '${tag}')"></i></li>`;
        cc_email_edit.insertAdjacentHTML("afterbegin", list_item);
    });
}

// this funciton goes to after enter the cc email input this function execute
function addTag_cc_email_edit(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !edit_cc_email_arr.includes(tag)){
            if(edit_cc_email_arr.length < 10){
                tag.split(',').forEach(tag => {
                    if (email_pattern.test(tag)) {
                        edit_cc_email_arr.push(tag);
                        createTag_cc_email_edit();
                    }else{
                        $('#').text('valid Email**');
                    }
                   
                });
            }
        }
        e.target.value = "";
    }
}

// 
input_cc_email_edit.addEventListener("keyup", addTag_cc_email_edit);


// this function remove the particular element in the array
function remove_cc_email_edit(element, tag){
    let index  = edit_cc_email_arr.indexOf(tag);
    edit_cc_email_arr = [...edit_cc_email_arr.slice(0, index), ...edit_cc_email_arr.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}


// reset array for the add alert modal reset email input
$('#email_check_toggle').on('change',function(){
    add_to_email_arr = [];
    add_cc_email_arr = [];
    // alert('ji');
    console.log("email to array length:\t"+add_to_email_arr.length);
    console.log("email to array length:\t"+add_cc_email_arr.length);

});


// reset array for the edit alert modal reset email input
$('#edit_email_check_toggle').on('change',function(){
    edit_cc_email_arr = [];
    edit_to_email_arr = [];
});










