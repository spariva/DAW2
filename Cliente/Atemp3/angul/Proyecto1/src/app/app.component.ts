import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

// Este archivo es el componente principal de la aplicación, es el que se encarga de cargar los demás componentes. Funciona como el index.html de una página web, es el primer archivo que se carga.
@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'Proyecto1';
}
