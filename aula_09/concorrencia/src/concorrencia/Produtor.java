/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package concorrencia;

public class Produtor implements java.lang.Runnable {

    Valores valor;

    public Produtor(Valores valor) {
        this.valor = valor;
    }

    public void run() {
        int tempo;
        int i;

        for (i = 0; i < 11; i++) {
            tempo = (int) (Math.random() * 3000);
            valor.guardar(i);
            System.out.println("O produtor está guardando o valor \t" + i);

            try {
                Thread.sleep(tempo);
            } catch (InterruptedException e) {

            }
        }
    }
}
