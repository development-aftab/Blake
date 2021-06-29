console.log('before', $("input:radio[class=option1]").prop('checked'));

// $("input:radio[id=option1]").prop('checked', true);

$("input:radio[class=option2]").click();
console.log('after', $("input:radio[class=option1]").prop('checked'));