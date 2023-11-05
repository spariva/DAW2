from django.contrib import admin
from django.urls import path

from . import views

# creamos el archivo urls dentro de la app y si esta vacia ponemos que renderice la vista del index
app_name = "polls"
urlpatterns = [
    path('', views.index, name="index"),
    path('<int:id>/', views.details, name="details"),
    path('<int:id>/resutls', views.results, name="results"),
    path('<int:id>/vote', views.vote, name="vote"),

]
