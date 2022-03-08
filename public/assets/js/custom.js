/* Events fired on the drag target */
function dragStart(event) {
  event.dataTransfer.setData("Text", event.target.id);
}

function dragging(event) {
}


/* Events fired on the drop target */
function allowDrop(event) {
  event.preventDefault();

}

function dragleave(event) {
  event.preventDefault();
  var droptarget = document.getElementById("droptarget");
  droptarget.style.backgroundColor = "white";
  //redisplay "Drop here text"
  var myobj = document.getElementById("drophere");
  if (myobj) {
    myobj.style.display = "block";
  }
}

function dragenter(event) {
  event.preventDefault();
  //display none "Drop here text"
  var myobj = document.getElementById("drophere");
  if (myobj) {
    myobj.style.display = "none";
  }
  var droptarget = document.getElementById("droptarget");
  droptarget.style.backgroundColor = "aliceblue";
}

function drop(event) {
  event.preventDefault();
  var droptarget = document.getElementById("droptarget");
  droptarget.style.backgroundColor = "white";
  //get id of dragging object
  var data = event.dataTransfer.getData("Text");
  //remove "Drop here text"
  var myobj = document.getElementById("drophere");
  if (myobj) {
    myobj.remove();
  }

  //check if the card is dropdown type or input type
  //if dropdown type
  //else if input type
  if (document.getElementById(data).children[4].classList.contains("dropdown")){
    //if choose value is not null
   
    if (document.getElementById(data + "_" + "choose_value").value) {
      var para = document.createElement("p");
      para.setAttribute("id", "droppeditem");
      //get title and choose value of dropped card
      var text = document.getElementById(data + "_" + "title").innerText + " : " + document.getElementById(data + "_" + "choose_value").value;
      var textnode = document.createTextNode(text);
      para.appendChild(textnode);
      //added title and choose value to target
      event.target.appendChild(para);
    } else {
      openmodal(event);
    }
  } else if (document.getElementById(data).children[4].classList.contains("input")) {
    //check if the input value is null or not
    //if not null , else null
    if (document.getElementById(data + "_" + "input_value").value) {
      var children = document.getElementById(data + "_body").children;
      for (let i = 0; i < children.length; i++) {
        var para = document.createElement("p");
        para.setAttribute("id", "droppeditem");
        //get title and input value of dropped card
        var text;
        if (document.getElementById(data).innerText == "AIDA") {
          text = "AIDA".substring(i, i + 1) + " : " + children[i].value;
        } else {
          text = document.getElementById(data).innerText + " : " + children[i].value;
        }
        //var text = document.getElementById(data+"_"+"title").innerText +" : "+ document.getElementById(data+"_"+"input_value").value;
        var textnode = document.createTextNode(text);
        para.appendChild(textnode);
        //added title and input value to target
        event.target.appendChild(para);
      };

    }
    else {
      //display modal to fill null data     
      openmodal(event);
    }
  }else if(document.getElementById(data).children[4].classList.contains("compound")){
    
      
      var input1 = document.getElementById(data + "_input_value1");
      var choosevalue = document.getElementById(data + "_choose_value");
      var input2 = document.getElementById(data + "_input_value2");

      if (input1.value || choosevalue.value || input2.value) {
        var para1 = document.createElement("p");
        para1.setAttribute("id", "droppeditem");
        var para2 = document.createElement("p");
        para2.setAttribute("id", "droppeditem");
        var para3 = document.createElement("p");
        para3.setAttribute("id", "droppeditem");
        //get title and input value of dropped card
        
        
        var text1 = input1.placeholder+ " : " + input1.value;
        var text2 = choosevalue.ariaLabel + " : " + choosevalue.value;
        var text3 = input2.placeholder+ " : " + input2.value;

        //var text = document.getElementById(data+"_"+"title").innerText +" : "+ document.getElementById(data+"_"+"input_value").value;
        var textnode1 = document.createTextNode(text1);
        var textnode2 = document.createTextNode(text2);
        var textnode3 = document.createTextNode(text3);

        para1.appendChild(textnode1);
        para2.appendChild(textnode2);
        para3.appendChild(textnode3);

        //added title and input value to target
        event.target.appendChild(para1);
        event.target.appendChild(para2);
        event.target.appendChild(para3);
    }
    else {
      //display modal to fill null data     
      openmodal(event);
    }

  }
}



//Modal
function openmodal(event) {
  //get id of dragged card
  var data = event.dataTransfer.getData("Text");
  document.getElementById("modal_title").innerText = document.getElementById(data+"_title").innerText;
  document.getElementById("modal_body").innerHTML = document.getElementById(data + "_body").innerHTML;
  document.getElementById("modal_body").style.display = "block";
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}


// When the user clicks cancel, close the modal
function closeclick() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

function modalokclick() {
  //get id of dropped card
  var data = document.getElementById("modal_title").innerText;

  var children = document.getElementById("modal_body").children;
  
  for (let i = 0; i < children.length; i++) {
    var para = document.createElement("p");
    para.setAttribute("id", "droppeditem");
    var text;
    if (document.getElementById("modal_title").innerText == "AIDA") {
      text = "AIDA".substring(i, i + 1) + " : " + children[i].value;
    } else {
      if (children[i].placeholder) {
        text = children[i].placeholder + " : " + children[i].value;
      } else {
        text = document.getElementById("modal_title").innerText + " : " + children[i].value;
      }
      
    }

    var textnode = document.createTextNode(text);
    para.appendChild(textnode);
    document.getElementById("droptarget").appendChild(para);
  }
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

function toggledropdown(event) {
  var id = event.target.parentNode.id;
  if (document.getElementById(id + "_body").style.display == "block") {
    document.getElementById(id + "_body").style.display = "none";
    document.getElementById(id + "_drop").className = "fa fa-chevron-down";
  } else {
    document.getElementById(id + "_body").style.display = "block";
    document.getElementById(id + "_drop").className = "fa fa-chevron-up";
  }

}

function toggleview(event) {
  var id = event.target.parentNode.id;
  var item = document.getElementById(id);
  //if the items are in Hidden, they will go back to their lists
  if (item.parentNode.id == "Hidden") {
    //get list number which is hidden in class
    var list = document.getElementById(item.classList[2]);
    event.target.className = "fa fa-eye";
    list.appendChild(item);
  }
  //else if Hidden list is already exits, the items just need to append
  else if (document.getElementById("Hidden Header")) {
    var list = document.getElementById("Hidden");
    event.target.className = "fa fa-eye-slash";
    list.appendChild(item);
  } //else Hidden list doesn't exits yet, create from start
  else {
    var lists = document.getElementById("lists");
    var list = document.createElement("div");
    list.className = "list";
    list.setAttribute("id", "Hidden");
    event.target.className = "fa fa-eye-slash";
    var list_header = document.createElement("div");
    list_header.className = "list-item";
    list_header.innerHTML = '<h4 id="Hidden Header">Hidden Items</h4><i style="float: right" class="fa fa-chevron-up" onclick="toggleHidden(event)" id="Hidden_drop"></i>';
    list.appendChild(list_header);
    list.appendChild(item);
  }
  lists.insertBefore(list, lists.firstChild);

}

function toggleHidden(event) {
  count = document.getElementById("Hidden").childElementCount;
  if (document.getElementById("Hidden_drop").classList.contains("fa-chevron-up")) {
    for (let i = 1; i < count; i++) {
      document.getElementById("Hidden").children[i].style.display = "none";
    }
    document.getElementById("Hidden_drop").className = "fa fa-chevron-down";
  } else {
    for (let i = 1; i < count; i++) {
      document.getElementById("Hidden").children[i].style.display = "block";
    }
    document.getElementById("Hidden_drop").className = "fa fa-chevron-up";
  }

}

function togglecard(event) {
  //get nav body
  var nav_body = document.getElementById("nav_body");
  //get whole list by using clicked button
  var item = document.getElementById(event.target.parentNode.parentNode.parentNode.id);
  //if clicked button is in navigation bar
  if (event.target.parentNode.parentNode.parentNode.parentNode.id == "nav_lists") {
    //re added to mainlist
    var mainlist = document.getElementById("lists");
    mainlist.appendChild(item);
    //re display all children
    var count = item.childElementCount;
    for (let i = 1; i < count; i++) {
      item.children[i].style.display = "block";
    }
    event.target.className = "fa fa-eye";
    // if there is no element left in nav list delete nav list
    if ( document.getElementById("nav_lists").childElementCount == 0) {
      document.getElementById("nav_lists").remove();
      //hide header
      document.getElementById("Hidden Cards").style.display = "none";
    }
  } //else clicked button is everywhere else
  else {
    //get nav list
    var nav_lists = document.getElementById("nav_lists");
    //if nav list is already exits
    if (nav_lists) {
      nav_lists.appendChild(item);
      event.target.className = "fa fa-eye-slash";
    } //else nav list is doesn't exits yet, create it
    else {
      //display header
      document.getElementById("Hidden Cards").style.display = "block";
      var lists = document.createElement("div");
      lists.className = "lists";
      lists.setAttribute("id", "nav_lists");
      lists.appendChild(item);
      nav_body.appendChild(lists);
      event.target.className = "fa fa-eye-slash";
    }
    //hide all children
    var count = item.childElementCount;
    for (let i = 1; i < count; i++) {
      item.children[i].style.display = "none";
    }
  }
}

//header
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.paddingLeft = "270px";
  document.getElementById("droprow").style.paddingLeft = "270px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.paddingLeft = "50px";
  document.getElementById("droprow").style.paddingLeft = "50px";
}

function add_dropdown_selected(event){
  
  var selected = document.getElementById(event.target.id);

  if (selected.value == "Dropdown type") {
    var addrow = document.getElementById("add_dropdown_value");
    addrow.style.display = "block";
    var addrow = document.getElementById("add_input_value");
    addrow.style.display = "none";
    var addrow = document.getElementById("add_compound_value");
    addrow.style.display = "none";
    document.getElementById('hidden_div').value = 1;
    document.getElementById('hidden_input_div').value = 0;
    document.getElementById('compound_hidden_div').value = 0;
  } else if(selected.value == "Input type"){
    var addrow = document.getElementById("add_dropdown_value");
    addrow.style.display = "none";
    var addrow = document.getElementById("add_input_value");
    addrow.style.display = "block";
    var addrow = document.getElementById("add_compound_value");
    addrow.style.display = "none";
    document.getElementById('hidden_input_div').value = 1;
    document.getElementById('hidden_div').value = 0;
    document.getElementById('compound_hidden_div').value = 0;
  }else if(selected.value == "Compound type"){
    var addrow = document.getElementById("add_dropdown_value");
    addrow.style.display = "none";
    var addrow = document.getElementById("add_input_value");
    addrow.style.display = "none";
    var addrow = document.getElementById("add_compound_value");
    addrow.style.display = "block";
    document.getElementById('hidden_input_div').value = 0;
    document.getElementById('hidden_div').value = 0;
    document.getElementById('compound_hidden_div').value = 1;
  }
}

var count = 1;
function add_dropdown_value(event){
  count++;
  var maindiv = document.getElementById("dropdown_field");
  var addeddiv = document.createElement('div');
  addeddiv.innerHTML = '<input name="'+count+'" class="form-control" type="text" placeholder="Dropdown value '+count+'" required="true"> ';
  var hiddendiv = document.getElementById('hidden_div');
  hiddendiv.innerHTML = '<input name="total" style="display: none" class="form-control" type="text" id="hidden_div" value="'+count+'" > ';
  if(count > 2){
    document.getElementById("hidden_div").remove();
  }
  maindiv.appendChild(addeddiv);
  maindiv.appendChild(hiddendiv);
  
}

var inputcount = 1;
function add_input_value(event){
  inputcount++;
  var maindiv = document.getElementById("input_field");
  var addeddiv = document.createElement('div');
  addeddiv.innerHTML = '<input name="input'+inputcount+'" class="form-control" type="text" placeholder="Input value '+inputcount+'" required="true"> ';
  var hiddendiv = document.getElementById('hidden_input_div');
  hiddendiv.innerHTML = '<input name="input_total" style="display: none" class="form-control" type="text" id="hidden_input_div" value="'+inputcount+'" > ';
  if(inputcount > 2){
    document.getElementById("hidden_input_div").remove();
  }
  maindiv.appendChild(addeddiv);
  maindiv.appendChild(hiddendiv);
  
}

var comcount = 1;
function compound_add_dropdown_value(event){
  comcount++;
  var maindiv = document.getElementById("compound_dropdown_field");
  var addeddiv = document.createElement('div');
  addeddiv.innerHTML = '<input name="compound'+comcount+'" class="form-control" type="text" placeholder="Dropdown value '+comcount+'" required="true"> ';
  var hiddendiv = document.getElementById('compound_hidden_div');
  hiddendiv.innerHTML = '<input name="compound_total" style="display: none" class="form-control" type="text" id="compound_hidden_div" value="'+comcount+'" > ';
  if(comcount > 2){
    document.getElementById("compound_hidden_div").remove();
  }
  maindiv.appendChild(addeddiv);
  maindiv.appendChild(hiddendiv);
  
}

function colorchange(event){
  var color_drop = document.getElementById("color_select");
  var value = document.getElementById("color_select").value;
  if (value == null) {
    color_drop.className="";
    color_drop.classList.add("form-select");
  } else {
    color_drop.className="";
    color_drop.classList.add("form-select");
    color_drop.classList.add("btn-"+value);
  }
  
}

// function deleteonclick($id){
//   alert($id);
//   if (confirm("Are you sure to delete this card?") == true) {
//     //window.location.href = "{{URL::to('/deletecard/"+$id+"')}}"
//     location.replace("{{ route('deletecard') }}?id="+$id);
//   } else {
//     return;
//   }
// }

function percentage(event){
  var inputfield = document.getElementById(event.target.id);
  inputfield.type = "text";
  var percentage = '%';
  inputfield.value = inputfield.value +percentage;
}

function changetype(event){
  var inputfield = document.getElementById(event.target.id);
  inputfield.type = "number";
  
}

function showallchild(){
  var children = document.getElementById('droptarget').children;
  var arr=[];
  for (let i = 0; i < children.length; i++) {   
    arr.push(children[i].innerHTML);
  }
  document.getElementById('all_data').value = arr;
}