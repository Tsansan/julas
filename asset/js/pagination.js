// pagination

const dataJurnal = document.getElementsByClassName('pagination-data');
const pagination = document.getElementsByClassName('pagination')[0]
const dataValue = dataJurnal.length;
const datalimit = 10;

const pageCount = Math.ceil(dataValue / datalimit);
const currentPage = 1;



// create pagination button
pagination.innerHTML += "<li class='page-item'><a class='page-link'>Previous</a></li>"

for (let i = 1; i <= pageCount; i++) {
    pagination.innerHTML += "<li class='page-item'><a class='page-link'>" + i + "</a></li>"
}

pagination.innerHTML += "<li class='page-item'><a class='page-link'>Nexts</a></li>"

const paginationButton = document.getElementsByClassName('page-item');

paginationButton[1].classList.add('active');

for (let i = 0; i < dataValue; i++) {
    dataJurnal[i].setAttribute('hidden', '');
}

const dataakhir = document.querySelectorAll('.active .page-link')[0].innerHTML * datalimit;
for (let i = 0; i < dataakhir; i++) {
    dataJurnal[i].removeAttribute('hidden');
}

for (let i = 1; i < paginationButton - 1; i++) {
    paginationButton[i].addEventListener('click', function () {
        document.querySelectorAll('.active')[0].classList.remove('active')
        paginationButton[i].classList.add('active');
    })
}

paginationButton[0].addEventListener('click', function () {
    if (paginationButton[1].classList[1] == 'active') {
        console.log('udah mentok bang')
    } else {
        for (let i = 1; i < paginationButton.length; i++) {
            if (paginationButton[i].classList[1] == 'active') {
                paginationButton[i].classList.remove('active');
                paginationButton[i - 1].classList.add('active');
                break;
            } else {
            }
        }
    };

    const activepage = document.querySelectorAll('.active .page-link')[0].innerHTML;
    const dataawal = (activepage - 1) * datalimit;
    const dataakhir = activepage * datalimit - 1

    for (let i = 0; i < dataValue; i++) {
        dataJurnal[i].setAttribute('hidden', '');
    }
    for (let i = dataawal; i <= dataakhir; i++) {
        dataJurnal[i].removeAttribute('hidden');

    }

})

paginationButton[paginationButton.length - 1].addEventListener('click', function () {
    if (paginationButton[paginationButton.length - 2].classList[1] == "active") {
        console.log('udah mentok bang')
    } else {
        for (let i = 1; i < paginationButton.length; i++) {
            if (paginationButton[i].classList[1] == 'active') {
                paginationButton[i].classList.remove('active');
                paginationButton[i + 1].classList.add('active');
                break;
            }
        }
    };

    const activepage = document.querySelectorAll('.active .page-link')[0].innerHTML;
    const dataawal = (activepage - 1) * datalimit;
    const dataakhir = activepage * datalimit


    for (let i = 0; i < dataValue; i++) {
        dataJurnal[i].setAttribute('hidden', '');
    }
    for (let i = dataawal; i < dataakhir; i++) {
        dataJurnal[i].removeAttribute('hidden');

    }
})