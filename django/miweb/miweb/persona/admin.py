from django.contrib import admin

# Register your models here.
from persona.models import TipoPersona
from persona.models import Persona

admin.site.register(TipoPersona)

admin.site.register(Persona)