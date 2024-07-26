// Validazione Client Side 
const formRegister = document.getElementById('register-form');
const password = document.getElementById('password');
const passwordConfirm = document.getElementById('password-confirm');
let isValid = false;

formRegister.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
    if(isValid){
        formRegister.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    isValid = false;
    const passwordValue = password.value;
    const passwordConfirmValue = passwordConfirm.value;
    
    if(passwordValue === '') {
        setError(password, 'La password è obbligatoria');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'La password deve avere almeno 8 caratteri')
    } else {
        setSuccess(password);
    }

    if(passwordConfirmValue === '') {
        setError(passwordConfirm, 'Conferma la password');
    } else if (passwordConfirmValue !== passwordValue) {
        setError(passwordConfirm, "Le password non coincidono");
    } else {
        setSuccess(passwordConfirm);
        isValid = true;
    }
   
};