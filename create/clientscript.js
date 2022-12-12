function valid(element)
{
        var s = element.value;
        s = s.replace(/\s/g, '');
        s = s.replace(/[a-zа-яё]/gi, '');
        let open=0;
        let close=0;
        for (let i = 0; i < s.length; i++) {
            if(s[i]=="<"){
                open++;
            }
            if(s[i]==">"){
                close++;
            }
        } 
        if(open%2==0 && open==close)
        {
            document.getElementById("submit").disabled = false;
            document.querySelector('#textarea').style.color = "black";
        }
        else{
            document.getElementById("submit").disabled = true;
            document.querySelector('#textarea').style.color = "red";
        }
    
}


function Add(element)
{
    if(element.value == "link") document.getElementById("textarea").value += `<a href=”” title=””> </a>`;
    if(element.value == "italic") document.getElementById("textarea").value += `<i> </i>`;
    if(element.value == "strike") document.getElementById("textarea").value += `<strike></strike>`;
    if(element.value == "strong") document.getElementById("textarea").value += `<strong> </strong>`;
}

function review(){
    if(document.getElementById("submit").disabled == true) alert("Есть не закрытый тег");
    else{
         document.getElementById("review").innerHTML = document.getElementById("textarea").value;
    }
}