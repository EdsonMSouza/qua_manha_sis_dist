package concorrencia;

public class Consumidor implements java.lang.Runnable {
    private Valores valor;
    public Consumidor(Valores valor) {
        this.valor = valor;
    }
    // método run()
    public void run() {
        int tempo;
        for (int i = 0; i < 11; i++) {
            tempo = (int) (Math.random() * 3000);
            System.out.println("O consumidor está lendo o valor: \t"
                    + valor.exibir());

            try {
                Thread.sleep(tempo);
            } catch (InterruptedException e) {

            }
        }
    }
}
