from django.contrib import admin

# importamos los modelos para que se puedan ver en la vista de administrador
from .models import Question, Choice

# Antes de modificar algo de la parte administrativa de la app sería conveniente haber creado un super usuario
# Register your models here.
# admin.site.register(Question)
# admin.site.register(Choice)

# Para editar el area administrativa configuraremos diferentes clases
# Y despues de crear la clase donde configuramos la vista registramos el modelo con la clase creada


class ChoiceInline(admin.StackedInline):
    # la clase tiene que heredar de StackedInline
    model = Choice
    extra = 3


class QuestionAdmin(admin.ModelAdmin):
    # Para cambiar el orden
    # fields = ['question_text', 'pub_date']

    # orden y fielsets
    fieldsets = [
        (None, {'fields': ['question_text']}),
        ('Date', {'fields': ['pub_date'], 'classes': ['collapse']}),
    ]
    # Añadimos la clase que hemos creado de choice para poner las opciones en linea
    inlines = [ChoiceInline]


admin.site.register(Question, QuestionAdmin)
