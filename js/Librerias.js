function IframeAuto(id) 
{
    if (!window.opera && document.all && document.getElementById) 
    {
        id.style.height = id.contentWindow.document.body.scrollHeight;
        id.style.width = id.contentWindow.document.body.scrollWidth;
    } 
    else if (document.getElementById) 
    {
        id.style.height = id.contentDocument.body.scrollHeight + "px";
        id.style.width = id.contentDocument.body.scrollWidth + "px";
    }
}
function relocate(page, params)
{
    var body = document.body;
    form = document.createElement('form');
    form.method = 'POST';
    form.action = page;
    form.name = 'jsform';
    for (index in params)
    {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = index;
        input.id = index;
        input.value = params[index];
        form.appendChild(input);
    }
    body.appendChild(form);
    form.submit();
}