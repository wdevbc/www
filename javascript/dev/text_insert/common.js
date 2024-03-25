document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('*').forEach(function (node) {
        node.innerHTML = node.innerHTML.replace(/{{(.*?)}}/g, function (match, key) {
            return messages[key] || match;
        });
    });
});
