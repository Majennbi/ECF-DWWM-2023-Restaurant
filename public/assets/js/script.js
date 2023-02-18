

const showModal = document.querySelector(".show-modalcust"),
    closeModal = document.querySelector(".close-modalcust"),
    modalContainer = document.querySelector(".modalcust-wrapper"),
    modalBg = document.querySelector(".modalcust-bg");

showModal.addEventListener("click", function () {
    modalContainer.classList.add("active");
    modalBg.classList.add("active");
});

closeModal.addEventListener("click", function () {
    modalContainer.classList.remove("active");
    modalBg.classList.remove("active");
});

modalBg.addEventListener("click", function () {
    modalContainer.classList.remove("active");
    modalBg.classList.remove("active");
});


// Function to display the error message linked to the booking hour control = in progress

/*function onClickBtnLike(event) {
    event.preventDefault();

    const url = this.href;
    const spanCount = this.querySelector('js-submit');

    axios.get(url).then(function (response) {
        console.log(response.data);
    })
}

document.querySelectorAll('js-booking').forEach(function (link) {
    link.addEventListener('click', onClickBtnLike);
});*/


//Function to add some filters to dishes page = in progress

/*const FiltersForm = document.querySelector('#filters');

document.querySelectorAll('#filters input').forEach(function (input) {
    input.addEventListener('change', function () {
        //console.log('Changement de valeur');
        const Form = new FormData(FiltersForm);

        const Params = new URLSearchParams();


        Form.forEach(function (value, key) {
            Params.append(key, value);
            //console.log(Params.toString())
        });

        const url = new URL(window.location.href);

        fetch(url.pathname + '?' + Params.toString() + "&ajax=1", {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function (response) {
            console.log(response);
        }).catch(function (e) {
            console.log(e);
        });
    });
});*/
