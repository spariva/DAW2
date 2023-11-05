from django.contrib import admin

# Register your models here.
from .models import Linea, Estacion, Incidencia


class EstacionInline(admin.StackedInline):
    model = Estacion
    extra = 2


class LineaAdmin(admin.ModelAdmin):
    list_display = ['nombre', 'color', 'distancia']

    fieldsets = [
        (None, {'fields': ['nombre', 'color']})
    ]

    inlines = [EstacionInline]


admin.site.register(Linea, LineaAdmin)


class IncidenciaAdmin(admin.ModelAdmin):
    list_display = ['texto', 'fecha']

    list_filter = ['fecha']


admin.site.register(Incidencia, IncidenciaAdmin)
