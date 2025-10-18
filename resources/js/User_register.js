import './bootstrap';
import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';

document.addEventListener('DOMContentLoaded', () => {

            const addform = document.getElementById('form-validation');
            const passwordInput = document.getElementById('password');
            
            const pwMsg = document.getElementById('password-msg');
            const teMsg = document.getElementById('telefono-msg')

            const correoInput = document.getElementById('correo');
            const correoError = document.querySelector('.correo-error');
            const telefonoError = document.querySelector('.telefono-error');
            const telefonoInput =document.getElementById('telefono');
            /* === Validación de contraseña en vivo === */
            passwordInput.addEventListener('input', () => {
                
                if (passwordInput.value.length >= 8 ) {
                    pwMsg.classList.add('valid');
                    pwMsg.textContent = 'Contraseña válida';
                } else {
                    pwMsg.classList.remove('valid');
                    pwMsg.textContent = 'Mínimo 8 caracteres';
                }

            });
            
       
            addform.addEventListener('submit', (e) => { 
                var notyf = new Notyf({
                    duration: 3500,
                    position:{
                        x:'center',
                        y:'top'
                    },
                });
                e.preventDefault();
                correoError.style.display = 'none';
                correoError.textContent = '';
                telefonoError.style.display = 'none';
                telefonoError.textContent = '';
                const correoRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/;
                const correoTrim = correoInput.value.trim();

                let isValid = true;

                /* 1. Valida campo e-mail */
                if (!correoRegex.test(correoTrim)) {
                    correoError.style.display = 'inline';
                    correoError.textContent = 'Correo no válido: usa Gmail, Hotmail u Outlook.';
                    isValid = false;
                }
               
                /* 2. Valida el resto con la API HTML5 */
                if (!addform.checkValidity()) {
                    addform.classList.add('was-validated');
                    isValid = false;
                }
                //compruebo que la contraseña no sea menor a 8 digitos
                if(passwordInput.value.length < 8){
                    isValid = false;
                }

                if(telefonoInput.value.length<7||telefonoInput.value.length>15){
                    telefonoError.style.display = 'inline';
                    telefonoError.textContent='Debe ingresar telefono(7 dígitos) o celular(10 dígitos)';
                    isValid=false;
                }

                if(isValid==false){
                    notyf.error('Datos faltantes o formato incorrecto');
                }
                 
                if (!isValid) return;  //evalua si es false 
                // aquí podrías hacer fetch(...) o form.submit();
                const datos = new FormData(addform);
                datos.append('accion','insertar');

                fetch('../Controlador/Controlador_cliente.php', {
                    method: 'POST',
                    body: datos 
                })
                    .then(response=>{
                        if(!response.ok){
                            throw new Error ('error al enviar los datos');
                        }
                        return response.text();
                    })
                    .then(data=>{
                        console.log("Respuesta del servidor:", data);

                        if(data.includes("Usuario registrado")){
                            notyf.success("Datos registrados");
                            setTimeout(() => {  
                                addform.reset();
                                addform.classList.remove('was-validated');
                                window.location.href=("Start_sesion.php");
                            }, 2000);
                        }else if(data.includes("El ID o el correo ya están registrados en la base de datos.")){
                            notyf.error(data);
                           // addform.reset();//limpia el formulario
                        }else if(data.includes("Error al registrar")){
                            notyf.error(data);
                            alert(data);
                        }
                    })
                    .catch(error=>{
                        //alert('paila todo '+ error.message);
                        notyf.error('error inesperado'+error.message);
                        addform.reset();
                    });
            });
        });