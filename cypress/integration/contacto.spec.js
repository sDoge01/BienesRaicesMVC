/// <reference types="cypress" />

describe('Prueba la página de contacto', ()=>{
    it('Llenando los formularios', ()=>{
        cy.visit('/contacto')

        cy.get('[data-cy="input-nombre"]').type('Philippe')
        cy.get('[data-cy="input-mensaje"]').type('Muy buenas tardes aaaa')
        cy.get('[data-cy="input-select"]').select('Compra')


        cy.get('[data-cy="presupuesto"]').type(5000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="input-telefono"]').type('123456789');
        cy.get('[data-cy="input-fecha"]').type('2022-03-31');
        cy.get('[data-cy="input-hora"]').type('18:30');


        cy.get('[data-cy="formulario-contacto"]').submit();


        
    })
})