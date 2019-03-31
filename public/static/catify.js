var syntaxHighlight = function(json) {
    if (typeof json != 'string') {
        json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}
var appendImage = function(section_name, url, img_title)
{
    var img=document.createElement("img");
    img.src  =url;
    img.id = img_title;
    var gifs = document.getElementById(section_name+'.gifs');
    gifs.appendChild(img);
}
var clearImages = function(section_name)
{
  var gifs = document.getElementById(section_name+'.gifs');
  while (gifs.firstChild) {
    gifs.removeChild(gifs.firstChild);
  }
}
var requestApi = function(token, path_name, section_name)
{
  var base_url = window.location.origin;
  var url = base_url+path_name;
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.setRequestHeader('API-TOKEN', token);
  xhr.onload = function(e) {
    if (xhr.readyState === 4) {
        var json = JSON.parse(this.responseText);
        var jsonstr = syntaxHighlight(json);
        document.getElementById(section_name+".jsonResponse").innerHTML = jsonstr;
        var index;
        var gif;
        clearImages(section_name);
        for (index = 0; index < json.data.length; ++index) {
            gif = json.data[index];
            appendImage(section_name, gif.url, gif.title);
        }
        }
    };
    xhr.onerror = function(e) {
        console.error(xhr.statusText);
    };
    xhr.send(null);
}
var doRandom = function()
{
  var token = document.getElementById('random.API-TOKEN').value;
  var url = '/api/random';
  requestApi(token, url, 'random');
  return false;
}
var doSearch = function() {
  var term = document.getElementById('search.search').value;
  var token = document.getElementById('search.API-TOKEN').value;
  var api_path = '/api/search/'+term;
  requestApi(token, api_path, 'search');
  return false;
}