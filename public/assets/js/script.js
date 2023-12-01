const income = document.querySelector('#income');
const expenditure = document.querySelector('#expenditure');
const income_selector = document.querySelector('#category_id');


income.addEventListener('click', () => {
    income_selector.disabled=true;
});

expenditure.addEventListener('click', () => {
    income_selector.disabled=false;
});

