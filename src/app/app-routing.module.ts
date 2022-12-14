import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AddComponent } from './components/add/add.component';
import { DeleteComponent } from './components/delete/delete.component';
import { DetailComponent } from './components/detail/detail.component';
import { EditComponent } from './components/edit/edit.component';
import { ListComponent } from './components/list/list.component';


const routes: Routes = [
  {path: '', pathMatch:'full', redirectTo: 'add'},
  {path: 'add', component: AddComponent},
  {path: 'list', component: ListComponent},
  {path: 'edit', component: EditComponent},
  {path: 'delete', component: DeleteComponent},
  {path: 'detail', component: DetailComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


