function open(id){
    var nTitle = document.getElementById('title' + id).innerHTML;
    var nContent = document.getElementById('content' + id).innerHTML;
    document.getElementById('title').innerHTML = nTitle;
    document.getElementById('content').innerHTML = nContent;
}
