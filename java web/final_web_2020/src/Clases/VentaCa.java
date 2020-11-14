package Clases;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the venta_ca database table.
 * 
 */
@Entity
@Table(name="venta_ca")
@NamedQuery(name="VentaCa.findAll", query="SELECT v FROM VentaCa v")
public class VentaCa implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="idventa_s", unique=true, nullable=false)
	private int idventaS;

	@Column(name="cantidad_venta")
	private int cantidadVenta;

	@Column(name="id_pro")
	private int idPro;

	public VentaCa() {
	}

	public int getIdventaS() {
		return this.idventaS;
	}

	public void setIdventaS(int idventaS) {
		this.idventaS = idventaS;
	}

	public int getCantidadVenta() {
		return this.cantidadVenta;
	}

	public void setCantidadVenta(int cantidadVenta) {
		this.cantidadVenta = cantidadVenta;
	}

	public int getIdPro() {
		return this.idPro;
	}

	public void setIdPro(int idPro) {
		this.idPro = idPro;
	}

}