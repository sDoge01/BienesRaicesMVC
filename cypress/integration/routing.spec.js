/// <reference types="cypress" />

describe('Prueba las rutas del Routing', ()=>{
    it('Probamos la barra de navegación', ()=>{
        cy.visit('/');


        cy.get('[data-cy="navegacion"]').should('exist');
        cy.get('[data-cy="navegacion"]').find('a').should('have.length', 4);
        

        //Revisa que los enlaces sean correctos:

        cy.get('[data-cy="navegacion"]').find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy="navegacion"]').find('a').eq(1).invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy="navegacion"]').find('a').eq(2).invoke('attr', 'href').should('equal', '/blog');
        cy.get('[data-cy="navegacion"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');

        //Revisa que los enlaces del footer estén correctos:
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto');

    })
})