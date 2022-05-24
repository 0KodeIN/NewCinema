function showEnter() {

    darkLayer.id = 'shadow';
    document.body.appendChild(darkLayer);

    let modalWin = document.getElementById('form1');
    modalWin.style.display = 'block';

    let value = document.getElementById('enter');
    value.onclick = function() {
        darkLayer.parentNode.removeChild(darkLayer);
        modalWin.style.display = 'none';
        let x = document.querySelectorAll('.input-form');
        console.log(x);
        return false;
    };
    let exit = document.getElementById('exit');
    exit.onclick = function() {
        darkLayer.parentNode.removeChild(darkLayer);
        modalWin.style.display = 'none';
        return false;
    };
}
let darkLayer = document.createElement('div');
showEnter();