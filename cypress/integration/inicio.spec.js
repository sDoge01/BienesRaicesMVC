/// <reference types ="cypress" />

    describe('Carga la página principal', ()=>{
        it('Prueba el header', ()=>{
            cy.visit('/');

             //document.querySelector('h1')

            //cy.get('h1') //Esto es lo mismo a lo de arriba, más simple
            //Aunque seleccionar simplemente un h1 es una mla práctica
            //Hay que ser muy específicos para evitar errores

            // Al usar corchetes estaremos hablando de usar un selector de CSS:
            cy.get('[data-cy="heading-inicio"]').should('exist'); 
            
        })

        describe('Prueba el header de la seccion nosotros', () =>{
            it('Probando el header de los iconos principales', ()=>{
                cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');


                //Selecciona los iconos y comprobamos que hay 3
                cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);


            })

            it('Prueba la sección de propiedades', ()=> {
                //Selecciona las propiedades y comprueba que hay 3
                cy.get('[data-cy="propiedades"').find('.anuncio').should('have.length', 3);


                //Selecciona una propiedad y le da click:
                cy.get('[data-cy="enlace-propiedad"]').first().click();
                cy.wait(3000);
                cy.go('back');


            })


            it('Prueba la sección de todas las propiedades', ()=>{
                cy.get('[data-cy="todas-propiedades"]').click();
                cy.scrollTo(0, 500);
                cy.wait(2000);
                cy.go('back');
            })


            it('Prueba la sección del contacto', ()=>{
                cy.get('[data-cy="boton-contacto"]').click()

                cy.wait(1500);

                cy.go('back');
            })

            it('Prueba la sección del blog', ()=>{
                cy.get('[data-cy="blog"]').should('exist');
                
                
                cy.get('[data-cy="testimoniales"]').should('exist');
            })
            
        })

        
    });