var formValid = document.getElementById('boutonEnvoi');
            var nom = document.getElementById('nom');
            var prenom = document.getElementById('prenom');
            var email = document.getElementById('email');
            var telephone = document.getElementById('telephone');
            var postal = document.getElementById('postal');
            var ville = document.getElementById('ville');

            var missNom = document.getElementById('missNom');
            var missPrenom = document.getElementById('missPrenom');
            var missEmail = document.getElementById('missEmail');
            var missTelephone = document.getElementById('missTelephone');
            var missPostal = document.getElementById('missPostal');
            var missVille = document.getElementById('missVille');

            var nomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
            var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
            var mailValid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            // var telValid = ^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$;
            // var telValid = /+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$;



            
            formValid.addEventListener('click', validation);
            
            function validation(event){
                //Si le champ prenom est vide
                console.log(nomValid.test(nom.value));
                if (nom.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Nom manquant';
                    missing.style.color = 'red';
                    nom.style.backgroundColor = "red";
                }else if (prenom.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Prénom manquant';
                    missing.style.color = 'red';
                    prenom.style.backgroundColor = "red";
                }else if (email.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Email manquant';
                    missing.style.color = 'red';
                    email.style.backgroundColor = "red";
                }else if (telephone.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Telephone manquant';
                    missing.style.color = 'red';
                    telephone.style.backgroundColor = "red";
                }else if (postal.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Code Postal manquant';
                    missing.style.color = 'red';
                    postal.style.backgroundColor = "red";
                }else if (ville.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Ville manquante';
                    missing.style.color = 'red';
                    ville.style.backgroundColor = "red";
                }else if (objet.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Objet manquant';
                    missing.style.color = 'red';
                    objet.style.backgroundColor = "red";
                }else if (message.validity.valueMissing){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Message manquant';
                    missing.style.color = 'red';
                    message.style.backgroundColor = "red";


                // //Si le format de données est incorrect
                }else if (nomValid.test(nom.value) == false){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Format incorrect';
                    missing.style.color = 'orangered';
                    nom.style.backgroundColor = "orangered";
                }else if (prenomValid.test(prenom.value) == false){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Format incorrect';
                    missing.style.color = 'orangered';
                    prenom.style.backgroundColor = "orangered";
                }else if (mailValid.test(email.value) == false){
                    event.preventDefault();
                    erreurMail.style.display = 'block'
                    missing.textContent = 'Format incorrect';
                    missing.style.color = 'orangered';
                    email.style.backgroundColor = "orangered";
                // }else if (telValid.test(telephone.value) == false){
                //     event.preventDefault();
                //     erreurMail.style.display = 'block'
                //     missing.textContent = 'Format incorrect';
                //     missing.style.color = 'orangered';
                //     telephone.style.backgroundColor = "orangered";
                }else{ 
                    missing.textContent = 'Message envoye';
                }
            }

            