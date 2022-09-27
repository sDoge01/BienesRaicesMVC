/// <reference types="cypress" />

    describe('Probar la autenticacion', ()=>{
        it('Prueba la página de login', ()=>{
            cy.visit('/login');


            cy.get('[data-cy="formulario-login"]').should('exist');
        })
    })