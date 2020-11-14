package Clases;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;


@Named
@SessionScoped
public class ControladorProducto implements Serializable {

	private static final long serialVersionUID = 1L;
	//creamos objeto de la clase
	private Producto producto;
	//creamos el constructor
	ControladorProducto(){
		producto = new Producto();
	}
	
	@PersistenceContext(unitName = "final_web_2020")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;
	
	/*metodo*/
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(producto);//este apunta a nuestro objeto 
	    userTransaction.commit();
	}

	public Producto getProducto() {
		return producto;
	}

	public void setProducto(Producto producto) {
		this.producto = producto;
	}

	
}
