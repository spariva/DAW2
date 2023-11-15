# Generated by Django 4.1.5 on 2023-02-23 17:08

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Estacion',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=50)),
            ],
        ),
        migrations.CreateModel(
            name='Linea',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=50)),
                ('color', models.CharField(max_length=15)),
                ('distancia', models.IntegerField()),
            ],
        ),
        migrations.CreateModel(
            name='Incidencia',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('texto', models.CharField(max_length=255)),
                ('fecha', models.DateTimeField(verbose_name='fecha y hora')),
                ('estacion', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='incidencias.estacion')),
            ],
        ),
        migrations.AddField(
            model_name='estacion',
            name='linea',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='incidencias.linea'),
        ),
    ]