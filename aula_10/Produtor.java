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
            System.out.println(
                "Produzindo \t" + i + "\t"
                + tempo + "/ms\t\t" + Thread.currentThread().getName()
                );

            try {
                Thread.sleep(tempo);
            } catch (InterruptedException e) {
                System.out.println("Run-Produtor: " + e.getMessage());
            }
        }
    }
}
