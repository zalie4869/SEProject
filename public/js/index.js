var indextable;




function editfunction(x){
    var old = [];
    indextable = x.rowIndex;

    for(var i = 0 ; i < document.getElementById("mytable").rows[x.rowIndex].cells.length ; i++){
        old[i] = document.getElementById('mytable').rows[x.rowIndex].cells[i].innerHTML;
    }
    console.log(old);
    document.getElementById("EmpID").value = old[0] ;
    document.getElementById("name").value = old[1];
    document.getElementById("pos").value = old[2];
    document.getElementById("phone").value = old[3];
    document.getElementById("mon").value = old[4]  ? old[4]:'' ;
    document.getElementById("tues").value = old[5] ? old[5]:'' ;
    document.getElementById("wed").value = old[6] ? old[6]:'' ;
    document.getElementById("thurs").value = old[7] ? old[7]:'' ;
    document.getElementById("fri").value = old[8] ? old[8]:'';
    document.getElementById("satur").value = old[9] ? old[9]:'';
    document.getElementById("sun").value = old[10] ? old[10]:'';

   
}
  

// function addedit(){
//     var table = document.getElementById("mytable");
//     table.rows[indextable].cells[0].innerHTML = document.getElementById("name").value;
//     table.rows[indextable].cells[1].innerHTML = document.getElementById("pos").value;
//     table.rows[indextable].cells[2].innerHTML = document.getElementById("phone").value;
//     table.rows[indextable].cells[3].innerHTML = document.getElementById("mon").value;
//     table.rows[indextable].cells[4].innerHTML = document.getElementById("tues").value;
//     table.rows[indextable].cells[5].innerHTML = document.getElementById("wed").value;
//     table.rows[indextable].cells[6].innerHTML = document.getElementById("thurs").value;
//     table.rows[indextable].cells[7].innerHTML = document.getElementById("fri").value;
//     table.rows[indextable].cells[8].innerHTML = document.getElementById("satur").value;
//     table.rows[indextable].cells[9].innerHTML = document.getElementById("sun").value;
// }





function showinfoedit(){
    var x = document.getElementById('disapp');
    var y = document.getElementById('btn-edit');
    var z = document.getElementById('btn-dis');
    x.style.display = 'block';
    y.style.display = 'block';
    window.scrollBy(0, 170);     
    z.style.display ='none'; 

    
}



// function showinfoinsert(){
//     var x = document.getElementById('disapp');
//     var y = document.getElementById('btn-dis');
//     var z = document.getElementById('btn-edit');
    
//     x.style.display = 'block';
//     y.style.display = 'block';
//     window.scrollBy(0, 170);
//     z.style.display ='none'; 
        
  

// }



function addrow(){
    var name = document.getElementById("name").value;
    var pos = document.getElementById("pos").value;
    var phone = document.getElementById("phone").value;
    var mon = document.getElementById("mon").value;
    var tues = document.getElementById("tues").value;
    var wed = document.getElementById("wed").value;
    var thurs = document.getElementById("thurs").value;
    var fri = document.getElementById("fri").value;
    var satur = document.getElementById("satur").value;
    var sun = document.getElementById("sun").value;

    var table = document.getElementById("mytable");
    var newrow = table.insertRow(-1);
    var cell0 = newrow.insertCell(0);
    var cell1 = newrow.insertCell(1);
    var cell2 = newrow.insertCell(2);
    var cell3 = newrow.insertCell(3);
    var cell4 = newrow.insertCell(4);
    var cell5 = newrow.insertCell(5);
    var cell6 = newrow.insertCell(6);
    var cell7 = newrow.insertCell(7);
    var cell8 = newrow.insertCell(8);
    var cell9 = newrow.insertCell(9);
    cell0.innerHTML = name;
    cell1.innerHTML = pos;
    cell2.innerHTML = phone;
    cell3.innerHTML = mon;
    cell4.innerHTML = tues;
    cell5.innerHTML = wed;
    cell6.innerHTML = thurs;
    cell7.innerHTML = fri;
    cell8.innerHTML = satur;
    cell9.innerHTML = sun;

    

}

function delrow(){
    var x = document.getElementById('disapp');
    var y = document.getElementById('btn-dis');
    var z = document.getElementById('btn-edit');
    
    console.log(indextable);
    // alert("You just Delete all in row " + document.getElementById('mytable').rows[indextable].cells[0].innerHTML);
    if(confirm("ลบข้อมูลของ " + document.getElementById('mytable').rows[indextable].cells[0].innerHTML)){
        document.getElementById("mytable").deleteRow(indextable);
        x.style.display='none';
        y.style.display='none';
        z.style.display='none';
    }
    
    
}









