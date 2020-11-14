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
public class ControladorVentas implements Serializable {

	private static final long serialVersionUID = 1L;
	//creamos objeto de la clase
	private VentaCa venta;
	//creamos el constructor
	ControladorVentas(){
		venta = new VentaCa();
	}
	
	@PersistenceContext(unitName = "final_web_2020")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;
	
	/*metodo*/
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(venta);//este apunta a nuestro objeto 
	    userTransaction.commit();
	}

	public VentaCa getVenta() {
		return venta;
	}

	public void setVenta(VentaCa venta) {
		this.venta = venta;
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
