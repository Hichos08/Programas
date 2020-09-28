using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using parcialWEB_2.Models;

namespace parcialWEB_2.Controllers
{
    public class DetalleFacturasController : Controller
    {
        private TParcialContext db = new TParcialContext();

        // GET: DetalleFacturas
        public ActionResult Index()
        {
            var detalleFacturas = db.DetalleFacturas.Include(d => d.Facturas).Include(d => d.Productos);
            return View(detalleFacturas.ToList());
        }

        // GET: DetalleFacturas/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            DetalleFactura detalleFactura = db.DetalleFacturas.Find(id);
            if (detalleFactura == null)
            {
                return HttpNotFound();
            }
            return View(detalleFactura);
        }

        // GET: DetalleFacturas/Create
        public ActionResult Create()
        {
            ViewBag.IdFactura = new SelectList(db.Facturas, "IdFactura", "IdFactura");
            ViewBag.IdProducto = new SelectList(db.Productoes, "IdProducto", "NombreProducto");
            return View();
        }

        // POST: DetalleFacturas/Create
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que quiere enlazarse. Para obtener 
        // más detalles, vea https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "IdDetalleOrden,IdFactura,IdProducto,Cantidad,preciounitario")] DetalleFactura detalleFactura)
        {
            if (ModelState.IsValid)
            {
                db.DetalleFacturas.Add(detalleFactura);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.IdFactura = new SelectList(db.Facturas, "IdFactura", "IdFactura", detalleFactura.IdFactura);
            ViewBag.IdProducto = new SelectList(db.Productoes, "IdProducto", "NombreProducto", detalleFactura.IdProducto);
            return View(detalleFactura);
        }

        // GET: DetalleFacturas/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            DetalleFactura detalleFactura = db.DetalleFacturas.Find(id);
            if (detalleFactura == null)
            {
                return HttpNotFound();
            }
            ViewBag.IdFactura = new SelectList(db.Facturas, "IdFactura", "IdFactura", detalleFactura.IdFactura);
            ViewBag.IdProducto = new SelectList(db.Productoes, "IdProducto", "NombreProducto", detalleFactura.IdProducto);
            return View(detalleFactura);
        }

        // POST: DetalleFacturas/Edit/5
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que quiere enlazarse. Para obtener 
        // más detalles, vea https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "IdDetalleOrden,IdFactura,IdProducto,Cantidad,preciounitario")] DetalleFactura detalleFactura)
        {
            if (ModelState.IsValid)
            {
                db.Entry(detalleFactura).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.IdFactura = new SelectList(db.Facturas, "IdFactura", "IdFactura", detalleFactura.IdFactura);
            ViewBag.IdProducto = new SelectList(db.Productoes, "IdProducto", "NombreProducto", detalleFactura.IdProducto);
            return View(detalleFactura);
        }

        // GET: DetalleFacturas/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            DetalleFactura detalleFactura = db.DetalleFacturas.Find(id);
            if (detalleFactura == null)
            {
                return HttpNotFound();
            }
            return View(detalleFactura);
        }

        // POST: DetalleFacturas/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            DetalleFactura detalleFactura = db.DetalleFacturas.Find(id);
            db.DetalleFacturas.Remove(detalleFactura);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
