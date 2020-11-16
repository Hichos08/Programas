from django.contrib import admin


from registros.models import origen 
from registros.models import sexo
from registros.models import RegistrarVisita 
from registros.models import actividade 
from registros.models import RegistrarActividade

class visitaAdmin(admin.ModelAdmin):
    list_display=("Nombre", "Apellido", "Edad", "Sexo", "Origen", "Pais", "Documento", "Fecha", "Tarifa")
    list_filter=("Edad", "Sexo", "Origen", "Fecha",)
    date_hierarchy="Fecha"

class registroactividadAdmin(admin.ModelAdmin):
    list_display=("visitante", "actividad")
    list_filter=("actividad",)

admin.site.register(origen)
admin.site.register(sexo)
admin.site.register(RegistrarVisita, visitaAdmin)
admin.site.register(actividade)
admin.site.register(RegistrarActividade, registroactividadAdmin)
