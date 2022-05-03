function text_print() {
    var input1 = document.getElementsByName('input1')[0].value;
    var input2 = document.getElementsByName('input2')[0].value;
    document.getElementsByName('txtarea')[0].value = input1.toUpperCase();
    document.getElementsByName('txtarea2')[0].value = input2.toLowerCase();
}