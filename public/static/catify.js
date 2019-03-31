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
var requestApi = function(token, path_name)
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
        document.getElementById("jsonResponse").innerHTML = jsonstr;
        document.getElementById("gif").src = json.data[0].url;
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
  requestApi(token, url);
  return false;
}
var doSearch = function() {
  var term = document.getElementById('search.search').value;
  var token = document.getElementById('search.API-TOKEN').value;
  var api_path = '/api/search/'+term;
  requestApi(token, api_path);
  return false;
}