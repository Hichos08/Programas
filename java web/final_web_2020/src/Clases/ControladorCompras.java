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
public class ControladorCompras implements Serializable {
	private static final long serialVersionUID = 1L;
	//creamos objeto de la clase
	private Compra compra;
	//creamos el constructor
	ControladorCompras(){
		compra = new Compra();
	}
	
	@PersistenceContext(unitName = "final_web_2020")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;
	
	/*metodo*/
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(compra);//este apunta a nuestro objeto 
	    userTransaction.commit();
	}

	public Compra getCompra() {
		return compra;
	}

	public void setCompra(Compra compra) {
		this.compra = compra;
	}


	/*
	public void buscar() throws Exception {
		Query query = em.createQuery("select u from Usuariob u where u.cui = :cui");
		query.setParameter("cui", usuariob.getCui());
		usuariob = (Usuariob)query.getSingleResult();
		
		
		busqueda de los ID de los inventarios y meterlos array y meterlos a combobox con jsp
	}
	*/
	
}
