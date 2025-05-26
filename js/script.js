let selects = document.querySelectorAll(".selectStatus");

selects.forEach((elem) => {
    let reject = elem.closest('form').querySelector(".rejectStatus");
    elem.addEventListener('change', () => {
        if (elem.value === 'Отказано') {
            reject.style.display = "block";
        } else {
            reject.style.display = "none";
            reject.value = "";
        }
    });
});