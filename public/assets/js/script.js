
// Function to display modal window in the Home page
const elements = [
    { eventType: 'click', element: document.querySelector('.show-modalcust') },
    { eventType: 'click', element: document.querySelector('.close-modalcust') },
    { eventType: 'click', element: document.querySelector('.modalcust-bg') },
];
const modalContainer = document.querySelector('.modalcust-wrapper');
const modalBg = document.querySelector('.modalcust-bg');

function toggleModal(container, bg) {
    container.classList.toggle('active');
    bg.classList.toggle('active');
}

elements.forEach(({ eventType, element }) => {
    element.addEventListener(eventType, () => {
        toggleModal(modalContainer, modalBg);
    });
});

// Function to allow the user to scroll up to the top of the page
function addButtonScrollBehavior(buttonId) {
    const mybutton = document.getElementById(buttonId);

    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    };

    mybutton.addEventListener("click", function () {
        document.documentElement.scrollTop = 0;
    });
}

addButtonScrollBehavior("ScrollBtn");


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
